import './Login.css';
import { Navigate } from 'react-router-dom';
import React, { useState, useEffect } from 'react';
import Cookies from 'js-cookie';

function Login() {
    
    useEffect(() => {
        fetch("http://localhost:8081/api/checklogin?token = "+new URLSearchParams({
            token: Cookies.get('token') ,
            credentials: 'include'
        }),        
        {
            method: "GET",
        }).then((response) => {
            return response.json(); 
        }).then((jsonObj) => {
            console.log(jsonObj.code);
            if(jsonObj.code==1){
                window.location.href = "./";
            }            
        });
    });
    
    const handleClick = () => {
        
        console.log("submitted");

        fetch("http://localhost:8081/api/login", {
            method: "GET",
            // body: {"Send":"Test"}
        }).then((response) => {
            console.log(response);
            return response.json(); // do something with response JSON
        }).then((jsonObj) => {
            console.log(jsonObj.code);
            console.log(jsonObj.token);
            Cookies.set('token',jsonObj.token);
            window.location.href = "./";
        });
    };

    return (
        <div className="Login">
            <div className="container">
                <div className="screen">
                    <div className="screen-com">
                        <h1>數位貨幣系統</h1>
                        <form  className="login">
                            <div className="login-field">
                                <input type="text" className="login-input" placeholder="Username" />
                            </div>
                            <div className="login-field">
                                <input type="password" className="login-input" placeholder="Password" />
                            </div>
                            <button className="login-btn" type="button" onClick={handleClick}>
                                <span className="btn-text">登入</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Login;