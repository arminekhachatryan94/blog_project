import { Injectable } from "@angular/core";
import { Http, Headers, Response } from "@angular/http";
import { Observable } from 'rxjs';

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
}