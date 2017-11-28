import { Injectable } from "@angular/core";
import { Http, Headers, Response } from "@angular/http";
import { Observable } from 'rxjs';
import 'rxjs/Rx';

@Injectable()
export class AuthService {
    constructor(private http: Http){
        
    }

    register(name: string, email: string, password: string){
        return this.http.post('http://127.0.0.1:8000/api/register',
            { name: name, email: email, password: password },
            { headers: new Headers({'X-Requested-With': 'XMLHttpRequest'}) }
        );
    }

    login(email: string, password: string){
        return this.http.post('http://127.0.0.1:8000/api/login',
            { email: email, password: password },
            { headers: new Headers({'X-Requested-With': 'XMLHttpRequest'}) }
        ).map(
            (response: Response) => {
                const token = response.json().token;
                const base64Url = token.split('.')[1];
                const base64 = base64Url.replace('-', '+').replace('_', '/');
                localStorage.setItem('id', response.json().user_id);
                localStorage.setItem('name', response.json().name);
                return {
                    token: token,
                    decoded: JSON.parse(window.atob(base64)),
                    user_id: response.json().user_id,
                    name: response.json().name,
                    error: response.json().error
                };
            }
        ).do(
            tokenData => {
                localStorage.setItem('token', tokenData.token);
            },
        );
    }

    getToken(){
        return localStorage.getItem('token');
    }

    getId(){
        return localStorage.getItem('id');
    }

    getName(){
        return localStorage.getItem('name');
    }

    resetLocalStorage(){
        localStorage.clear();
    }

}