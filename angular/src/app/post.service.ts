import { Injectable } from '@angular/core';
import { Http, Response, Headers } from '@angular/http';
import 'rxjs/Rx';
import { Observable } from "rxjs";

@Injectable()
export class PostService {
	constructor(private http: Http){

	}

	addPost(body: string){
		const savebody = JSON.stringify({body: body});
		const headers = new Headers({'Content-Type': 'application/json'});

		return this.http.post('http://127.0.0.1:8000/api/post', body, {headers: headers});
	}

	getPosts(): Observable<any>{
		return this.http.get('http://127.0.0.1:8000/api/posts').map(
			(response: Response) => {
				return response.json().quotes;
			}
		);
	}

	updatePost(id: number, newContent: string){
		const body = JSON.stringify({body: newContent});
		const headers = new Headers({'Content-Type': 'application/json'});
		return this.http.put('http://127.0.0.1:8000/api/post/' + id, body, {headers: headers}).map(
			(response: Response) => response.json()
		);
	}

	deletePost(id: number){
		return this.http.delete('http://127.0.0.1:8000/api/post/' + id);
	}
}