import React from 'react';
import List from './ListComponent';

class App extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      data: []
    };
  }
  componentDidMount() {
    window.navigator.geolocation.getCurrentPosition((pos) => {
      const loc = {
        lat: pos.coords.latitude,
        lng: pos.coords.longitude,
      };

      let data;
      $.ajax({
        url: `https://infinite-brook-58503.herokuapp.com/api/shelters.php?lat=${loc.lat}&long=${loc.lng}`,
        crossDomain: true,
        dataType: 'json',
        xhrFields: {
          widthCredentials: true,
        },
        success: function(data) {
          $('.loader').remove();
          this.setState({ data });
          const map = new google.maps.Map(document.getElementById('map'), {
            center: loc,
            zoom: 13,
          });

          const marker = new google.maps.Marker({
            position: loc,
            map,
            title: 'Your Location',
            icon: 'https://developers.google.com/maps/documentation/javascript/examples/full/images/beachflag.png'
          });

          this.state.data.forEach(shelter => {
            const mark = new google.maps.Marker({
              position: { lat: Number(shelter.lat), lng: Number(shelter.long) },
              map,
              title: shelter.name,
            });
          });
        }.bind(this)
      });
    });
  }

  render() {
    return (
      <div>
        <div id="map"></div>
        <div className="container">
        <div className="row">
          <div className="col-sm-12">
            <h1 id="greeting" className="text-center">Find the closest open beds</h1>
          </div>
        </div>
        <List data={this.state.data} />
      </div>
      </div>
    );
  }
}

export default App;
