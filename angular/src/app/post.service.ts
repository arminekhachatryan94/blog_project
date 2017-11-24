import { Injectable } from '@angular/core';
import { Http, Response, Headers } from '@angular/http';
import 'rxjs/Rx';
import { Observable } from "rxjs";

import { AuthService } from './auth.service';

@Injectable()
export class PostService {
	constructor(private http: Http, private authService: AuthService){

	}

	addPost(body: string){
		const token = this.authService.getToken();

		const savebody = JSON.stringify({body: body});
		const headers = new Headers({'Content-Type': 'application/json'});

		return this.http.post('http://127.0.0.1:8000/api/post?token=' + 'token', body, {headers: headers});
	}

	getPosts(): Observable<any>{
		return this.http.get('http://127.0.0.1:8000/api/posts').map(
			(response: Response) => {
				return response.json().quotes;
			}
		);
	}

	updatePost(id: number, newContent: string){
		const token = this.authService.getToken();

		const body = JSON.stringify({body: newContent});
		const headers = new Headers({'Content-Type': 'application/json'});
		return this.http.put('http://127.0.0.1:8000/api/post/' + id + "?token=" + token, body, {headers: headers}).map(
			(response: Response) => response.json()
		);
	}

	deletePost(id: number){
		const token = this.authService.getToken();
		
		return this.http.delete('http://127.0.0.1:8000/api/post/' + id + "?token=" + token);
	}
}