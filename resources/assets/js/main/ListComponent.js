import React from 'react';
import Shelter from './ShelterComponent';

class List extends React.Component {
  constructor(props) {
    super(props);
  }

  render() {
    const nodes = this.props.data.map(shelter => <Shelter data={shelter} />);
    return <div className="shelter-list"> {nodes} </div>;
  }
}

export default List;
