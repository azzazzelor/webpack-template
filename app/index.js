import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import './index.scss'
import Title from './Title.jsx'

class App extends Component {
  constructor(props){
    super(props);
  this.state={
    title:null,
  }}
  render() {
    
   
    const getTitleRender=(val)=>{let title =val.title.rendered;};
    let posts = new wp.api.collections.Posts();

    posts.fetch().then(response =>response.map(getTitleRender)).then(titles=>this.setState({title: titles}))
    return (<Title props={this.state.title}/>)
  }
}

if (document.getElementById('root')) {
	ReactDOM.render(<App />, document.getElementById('root'));
} else {
	console.error("Root container was not fund!", {
		action: "ReactDOM.render(<App />, document.getElementById('root'))"
	});
}
