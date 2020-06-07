import React from 'react';
import './assets/css/color.css'
import './assets/css/style.css'
import './assets/css/reset.css'
import './assets/css/plugins.css'
import './App.css';

class Home extends React.Component {
  render() {
    return (
        <div className="App">
                       <header className="main-header dark-header fs-header sticky">
                <div className="header-inner">
                    <div className="logo-holder">
                        <a href="index.html"><img src="images/logo.png" alt=""/></a>
                    </div>
                    <div className="header-search vis-header-search">
                        <div className="header-search-input-item">
                            <input type="text" placeholder="Keywords" value=""/>
                        </div>
                        <div className="header-search-select-item">
                            <select data-placeholder="All Categories" className="chosen-select" >
                                <option>All Categories</option>
                                <option>Shops</option>
                                <option>Hotels</option>
                                <option>Restaurants</option>
                                <option>Fitness</option>
                                <option>Events</option>
                            </select>
                        </div>
                        <button className="header-search-button" onclick="window.location.href='listing.html'">Search</button>
                    </div>
                    <div className="show-search-button"><i className="fa fa-search"></i> <span>Search</span></div>
                    <a href="dashboard-add-listing.html" className="add-list">Add Listing <span><i className="fa fa-plus"></i></span></a>
                    <div className="show-reg-form modal-open"><i className="fa fa-sign-in"></i>Sign In</div>
                    <div className="nav-button-wrap color-bg">
                        <div className="nav-button">
                            <span></span><span></span><span></span>
                        </div>
                    </div>
                    <div className="nav-holder main-menu">
                        <nav>
                            <ul>
                                <li>
                                    <a href="#">Home <i className="fa fa-caret-down"></i></a>
                                    <ul>
                                        <li><a href="index.html">Parallax Image</a></li>
                                        <li><a href="index2.html">Video</a></li>
                                        <li><a href="index3.html">Map</a></li>
                                        <li><a href="index4.html">Slideshow</a></li>
                                        <li><a href="index5.html">Slider</a></li>
                    <li><a href="index6.html">Fullscreen Slider</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#" className="act-link">Listings <i className="fa fa-caret-down"></i></a>
                                   
                                    <ul>
                                        <li><a href="listing.html">Column map</a></li>
                                        <li><a href="listing2.html">Column map 2</a></li>
                                        <li><a href="listing3.html">Fullwidth Map</a></li>
                                        <li><a href="listing4.html">Fullwidth Map 2</a></li>
                                        <li><a href="listing5.html">Without Map</a></li>
                                        <li><a href="listing6.html">Without Map 2</a></li>
                                        <li>
                                            <a href="#">Single <i className="fa fa-caret-down"></i></a>
                                           
                                            <ul>
                                                <li><a href="listing-single.html">Style 1</a></li>
                                                <li><a href="listing-single2.html">Style 2</a></li>
                                                <li><a href="listing-single3.html">Style 3</a></li>
                        <li><a href="listing-single4.html">Style 4</a></li>
                                            </ul>
                                           
                                        </li>
                                    </ul>
                                   
                                </li>
                                <li>
                                    <a href="blog.html">News</a>
                                </li>
                                <li>
                                    <a href="#">Pages <i className="fa fa-caret-down"></i></a>
                                    
                                    <ul>
                                        <li><a href="about.html">About</a></li>
                                        <li><a href="contacts.html">Contacts</a></li>
                                        <li><a href="author-single.html">User single</a></li>
                                        <li><a href="how-itworks.html">How it Works</a></li>
                                        <li><a href="pricing-tables.html">Pricing</a></li>
                                        <li><a href="dashboard-myprofile.html">User Dasboard</a></li>
                                        <li><a href="blog-single.html">Blog Single</a></li>
                                        <li><a href="dashboard-add-listing.html">Add Listing</a></li>
                                        <li><a href="404.html">404</a></li>
                                        <li><a href="coming-soon.html">Coming Soon</a></li>
                                        <li><a href="header2.html">Header 2</a></li>
                                        <li><a href="footer-fixed.html">Footer Fixed</a></li>
                                    </ul>
                                   
                                </li>
                            </ul>
                        </nav>
                    </div>
                  
                </div>
            </header>
        </div>
      );

    }  

}

export default Home;
