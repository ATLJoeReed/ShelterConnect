
var BedsContent = React.createClass({

    getInitialState: function () {
        return { available: 0, occupied: 0, unavailable: 0, reserved: 0, total: 0, maxAvailable: 0, maxOccupied: 300 };

    },

    componentDidMount: function () {
        this.serverRequest = $.get(this.props.source, function (result) {

            this.setState(result);
        }.bind(this));

        //GLOBAL variable on window
        window.Beds = this;
    },

    getValues: function () {
        return {
            available: this.state.available, occupied: this.state.occupied, unavailable: this.state.unavailable,
            reserved: this.state.reserved, total: this.state.total
        };
    },

    updateStateFromModal: function (vals) {
        this.setState({ available: vals.available, occupied: vals.occupied, unavailable: vals.unavailable, total: vals.total });
        this.recomputeTotals();
    },

    componentDidUpdate: function () {
        if (this.state.recomputeTotal) this.computeTotals();
    },

    personIn: function () {
        this.setState({ available: Number(this.state.available) - 1, occupied: Number(this.state.occupied) + 1 });
        this.recomputeTotals();
    },

    personOut: function () {
        this.setState({ available: Number(this.state.available) + 1, occupied: Number(this.state.occupied) - 1 });
        this.recomputeTotals();
    },

    bedInMaint: function () {
        this.setState({ unavailable: Number(this.state.unavailable) + 1, available: Number(this.state.available) - 1 })
        this.recomputeTotals();
    },

    bedOutMaint: function () {
        this.setState({ unavailable: Number(this.state.unavailable) - 1, available: Number(this.state.available) + 1 })
        this.recomputeTotals();
    },

    changeOccupied: function (f) {
        this.setState({ occupied: f.target.value });
        this.recomputeTotals();
    },

    changeUnavailable: function (g) {
        this.setState({ unavailable: g.target.value });
        this.recomputeTotals();
    },

    recomputeTotals: function () {
        this.state.recomputeTotal = true;
    },

    computeTotals: function () {
        var available = Number(this.state.total) - Number(this.state.occupied) - Number(this.state.unavailable) - Number(this.state.reserved);
        var maxAvailable = Number(this.state.total) - Number(this.state.unavailable);
        var maxOccupied = Number(this.state.total) - Number(this.state.unavailable) - Number(this.state.reserved);
        this.state.disablePersonIn = this.state.available <= 0;
        this.state.disablePersonOut = this.state.occupied <= 0;

        this.setState({ available: available, maxAvailable: maxAvailable, maxOccupied: maxOccupied, recomputeTotal: false });

        //save results to server here
    },

    render: function () {
        return (
        <div className="row">
                <div className="col-xs-12 vert">
                    <div className="number-spinner row">
                        <div className="col-xs-6 in-out-buttons">
                            <div className="data-dwn">
                                <button disabled={this.state.disablePersonIn} className="btn btn-default btn-info btn-lg ui-btn ui-shadow ui-corner-all" onClick={this.personIn}> In </button>
                            </div>
                            <div className="data-up">
                                <button disabled={this.state.disablePersonOut} className="btn btn-default btn-warning btn-lg ui-btn ui-shadow ui-corner-all" onClick={this.personOut}> Out </button>
                            </div>
                        </div>
                        <div className="col-xs-6">
                            <div className="text-center avail-beds">
                                <div className="ui-input-text ui-body-inherit ui-corner-all ui-shadow-inset">
                                    <input type="number" className="text-center accented-value" value={this.state.occupied} onChange={this.changeOccupied} min="0" max={this.state.maxOccupied} />
                                </div>
                                <span class-="text-center">Occupied Beds</span>
                            </div>
                        </div>
                    </div>


                </div>
                <div className="col-xs-12 ">
                    <h3>
                        Beds
                        <button className="btn btn-link pull-right" data-toggle="modal" data-target="#editValues">Edit</button>
                    </h3>
                    <table className="table beds-table">
                    <tbody>


                         <tr>
                         <td>Available</td>
                         <td>
                             <span className="accented-value">{this.state.available}</span>

                         </td>
                         </tr>
                         <tr><td>Reserved</td><td className="unaccented-value">{this.state.reserved}</td></tr>

                         <tr>
                          <td>Unavailable (maint)</td>
                            <td>
                                <div className="maint-inputs">

                                    <button className="btn btn-unobtrusive fa fa-minus" onClick={this.bedOutMaint}></button>
                                    <span className="accented-value">
                                        {this.state.unavailable}
                                    </span>

                                    <button className="btn btn-unobtrusive fa fa-plus" onClick={this.bedInMaint}></button>
                                </div>
                            </td>
                         </tr>

                        <tr><td>Total</td><td className="unaccented-value"> {this.state.total}</td></tr>

                    </tbody>
                    </table>


                </div>
        </div>
    );
    }
});



var Reservation = React.createClass({
    checkIn: function () {
        this.props.onUserInput('check_in', this);
    },

    notHere: function () {
        this.props.onUserInput('not_here', this);
    },

    fadeOut : function(){
        //
    },

    render: function () {
        return (
        <li className="list-group-item reservation-item">
          <div className="row">

              <div className="col-xs-7 col-xs-12-500">
                <p className="list-group-item-text">
                    <i className="fa fa-3x fa-clock-o pull-left muted-icon"></i>
                </p>
                <div className="text-left">
                  <h4 className="list-group-item-heading">{this.props.r_name }</h4>
                  <p className="list-group-item-text">
                      {this.props.exp_time} by&nbsp;
                         <a href={this.props.user_href}>{this.props.user_name}</a>
                  </p>
                </div>
              </div>

              <div className="col-xs-5 col-xs-12-500 text-right">
                   <button className="btn btn-sm btn-info" onClick={this.checkIn}>Check In</button>&nbsp;
                   <button className="btn btn-sm btn-warning" onClick={this.notHere}>No Show</button>
              </div>
          </div>
        </li>
      );
    }
});

var ReservationList = React.createClass({
    getInitialState: function () {
        return { data: [] };
    },
    componentWillMount: function () {
        this.serverRequest = $.get(this.props.source, function (result) {
            var res = result.map(myJsonMap.mapReservation);
            this.setState({ data: res });
        }.bind(this));
        
        //global
        window.Reservations = this;
    },

    addReservation(vals){

        //go to server to get new data for
        //<Reservation key={r.id} r_id={r.id} r_name={r.name} exp_time={r.exp_time} user_name={r.user.name} user_href={r.user.href} onUserInput={that.onUserInput}></Reservation>
        // 
        var dat = this.state.data;
     
        var el = {
            id : new Date().getTime(),
            name : vals.name,
            exp_time : vals.time,
            user: {
                id : 2,
                name : "Me",
                href : "/users/id"
            }
        };
        //dat.push(el);
        var c = dat[0]
        dat.push(el);
        debugger;
        this.setState({ data: dat });
    },

    onUserInput: function (opt, item) {

        //find element with matching id.
        var dat = this.state.data;
        var id = item.props.r_id;
        for (var ix = 0; ix < dat.length; ix++) {
            if (dat[ix].id == id) { 
                var d2 = dat[ix];
                var removed = this.state.data.splice(ix, 1);
                this.setState({ data: this.state.data });

                //talk to server here

                // if not success, undo, else redo

                break;
            }
        }
    },

    render: function () {

        var that = this;
        var reservations = this.state.data.map(function (r) {
            return (
                <Reservation key={r.id} r_id={r.id} r_name={r.name} exp_time={r.exp_time} user_name={r.user.name} user_href={r.user.href} onUserInput={that.onUserInput}></Reservation>
            );
        });
        return (
          <ul className="list-group">
              { reservations }
          </ul>
        );
    }
});


//transformation function ( adapters for api data )
function formatTime(d) {
    var hours = d.getHours();
    var minutes = ("0" + d.getMinutes()).slice(-2);
    if (hours > 12) return (hours - 12) + ':' + minutes + ' pm';
    if (hours == 0) return '12:' + minutes + ' am';
    return hours + ':' + minutes + ' am';
}

//small lib to transform data from server to client
var myJsonMap = {};
myJsonMap.mapReservation = function (data) {
    return {
        id: data['reservationID'],
        name: data['reservedFor'],
        exp_time: formatTime(new Date(data['expDate'])), //expects https://en.wikipedia.org/wiki/ISO_8601 date
        user: {
            id: data['userID'],
            name: data['userName'],
            href: '/users/' + data['UserID']
        }
    };
}



var PageContent = React.createClass({
    render: function () {
        return (
               <div>
            <div className="col-md-6">
               <h1>Walk-Ins</h1>
               <BedsContent source='/api/beds'></BedsContent>
            </div>
            <div className="col-md-6">
                <h1>Reservations <button className="btn btn-link pull-right" data-toggle="modal" data-target="#addReservation">Add</button></h1>
                <ReservationList source="/api/reservation"></ReservationList>
            </div>

               </div>
        );
    }
});


ReactDOM.render(
  <PageContent />,
  document.getElementById('app')
);
