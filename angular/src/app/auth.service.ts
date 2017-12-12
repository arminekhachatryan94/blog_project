import { Injectable } from '@angular/core';
import { Http, Headers, Response } from '@angular/http';
import { Observable } from 'rxjs';
import { Router } from '@angular/router';

import 'rxjs/Rx';

@Injectable()
export class AuthService {
    constructor(private http: Http, private router: Router) {
    }

    register(firstName: string, lastName: string, email: string, password: string) {
        return this.http.post('http://comp586.us-west-1.elasticbeanstalk.com/api/register',
            { firstName: firstName, lastName: lastName, email: email, password: password },
            { headers: new Headers({'X-Requested-With': 'XMLHttpRequest'}) }
        ).map(
            (response: Response) => {
                if (response['statusText'] == 'Created') {
                    // location.reload();
                    this.router.navigate(['/login']);
                    alert('User successsfully created. Please login to verify.');
                }
                else {
                    // location.reload();
                    // this.router.navigate(['/']);
                    alert('Sorry, email already exists. Please try again with another email.');
                }
            }
        );
    }

    login(email: string, password: string) {
        return this.http.post('http://comp586.us-west-1.elasticbeanstalk.com/api/login',
            { email: email, password: password },
            { headers: new Headers({'X-Requested-With': 'XMLHttpRequest'}) }
        ).map(
            (response: Response) => {
                const token = response.json().token;
                const base64Url = token.split('.')[1];
                const base64 = base64Url.replace('-', '+').replace('_', '/');
                localStorage.setItem('id', response.json().user_id);
                localStorage.setItem('firstName', response.json().firstName);
                localStorage.setItem('lastName', response.json().lastName);
                return {
                    token: token,
                    decoded: JSON.parse(window.atob(base64)),
                    user_id: response.json().user_id,
                    firstName: response.json().firstName,
                    lastName: response.json().lastName,
                    error: response.json().error
                };
            }
        ).catch((error: any) => {
            if (error.status === 404) {
                this.router.navigate(['/login']);
                return Observable.throw(new Error(error.status));
            }
            else if (error.status === 401) {
                this.router.navigate(['/login']);
                return Observable.throw(new Error(error.status));
            }
        }).do(
            tokenData => {
                localStorage.setItem('token', tokenData.token);
            },
        );
    }

    getToken() {
        return localStorage.getItem('token');
    }

    getId() {
        return localStorage.getItem('id');
    }

    getFirstName() {
        return localStorage.getItem('firstName');
    }

    getLastName() {
        return localStorage.getItem('lastName');
    }

    resetLocalStorage() {
        localStorage.clear();
    }

    isAuth() {
        return !!localStorage.getItem('token');
    }
}
