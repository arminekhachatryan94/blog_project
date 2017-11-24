import { Injectable } from '@angular/core';
import { Http, Response } from '@angular/http';
import 'rxjs/Rx';
import { Observable } from "rxjs";

@Injectable()
export class PostService {
	constructor(private http: Http){

	}

	getPosts(): Observable<any>{
		return this.http.get('https://blog.dev/api/posts').map(
			(response: Response) => {
				return response.json().quotes;
			}
		);
	}
}