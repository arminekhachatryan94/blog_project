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

		return this.http.post('https://blog.dev/api/post', body, {headers: headers});
	}

	getPosts(): Observable<any>{
		return this.http.get('https://blog.dev/api/posts').map(
			(response: Response) => {
				return response.json().quotes;
			}
		);
	}

	updatePost(id: number, newContent: string){
		const body = JSON.stringify({body: newContent});
		const headers = new Headers({'Content-Type': 'application/json'});
		return this.http.put('https://blog.dev/api/post/' + id, body, {headers: headers}).map(
			(response: Response) => response.json()
		);
	}

	deletePost(id: number){
		return this.http.delete('https://blog.dev/api/post/' + id);
	}
}