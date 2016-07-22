import React from 'react';

class Shelter extends React.Component {
  constructor(props) {
    super(props);
  }

  componentDidMount() {
    $(this.refs.shelter).on('click', function(e) {
  var $this = $(this);

  if ($this.hasClass('shelterActive')) {
    $('.shelter').removeClass('shelterActive');
    return;
  }
  $('.shelter').removeClass('shelterActive');
  if (!$this.hasClass('shelterActive')) {
      $this.addClass('shelterActive');
  }
  e.preventDefault();
});
  }

  render() {
    return (
  <div ref="shelter" className="shelter row">
        <div className="bedDisplay">
          <svg className="bed" version="1.1" id="Layer_1"  x="0px" y="0px"
             viewBox="0 0 89.9 57.8">
          <g>
            <path d="M19.3,22.8c4.5,0,8.2-3.7,8.2-8.2c0-4.5-3.7-8.2-8.2-8.2c-4.5,0-8.2,3.7-8.2,8.2C11.1,19.1,14.8,22.8,19.3,22.8z"/>
            <path d="M15,31.9h17.2c2,0,3.6-1.4,4-3.3c0.1-0.3,0.1-0.6,0.1-0.9V16.2c0-2.3-1.8-4.1-4.1-4.1c-2.3,0-4.1,1.8-4.1,4.1v7.5H15c-2.3,0-4.1,1.8-4.1,4.1C10.9,30.1,12.8,31.9,15,31.9z"/>
            <path d="M79.2,31.2c0-10.3-8.4-19.2-18.7-19.2H38v19.8h41.2C79.2,31.7,79.2,31.5,79.2,31.2z"/>
            <path d="M85.2,11.7c-2.6,0-4.7,2.1-4.7,4.7v17.9H9.4V4.7C9.4,2.1,7.3,0,4.7,0C2.1,0,0,2.1,0,4.7v53.1h9.4v-13h71.1v13h9.4V16.5C89.9,13.9,87.8,11.7,85.2,11.7z"/>
          </g>
          </svg>
          <p className="text-center">{this.props.data.beds_available}</p>
        </div>
        <div className="bedInfo">
          <h2>{this.props.data.name}</h2>
          <p>{`${Number(this.props.data.distance).toFixed(2)} miles away`}</p>
          <p><a href={`tel:${this.props.data.phone_1}`}>{this.props.data.phone_1}</a></p>          <p>{this.props.data.address_1}</p>
		  <form action={'https://www.google.com/maps/dir/'+this.props.data.name+'/@' + this.props.data.latitude + ','+this.props.data.longitude + ',8z'}>
	        <button type="submit" value="Directions">Directions</button>
		  </form>
        </div>
    </div>
    );
  }
}

export default Shelter;
