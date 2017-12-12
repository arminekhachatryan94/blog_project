import { Injectable } from '@angular/core';
import { Http, Response, Headers } from '@angular/http';
import 'rxjs/Rx';
import { Observable } from 'rxjs';

import { AuthService } from './auth.service';
import { Router } from '@angular/router';

@Injectable()
export class PostService {
	constructor(private http: Http, private authService: AuthService, private router: Router){
	}

	addPost(id: number, title: string, body: string){
		const token = this.authService.getToken();

		const post = JSON.stringify({user_id: id, title: title, body: body});
		const headers = new Headers({'Content-Type': 'application/json'});

		return this.http.post('http://comp586.us-west-1.elasticbeanstalk.com/api/post?token=' + token, post, {headers: headers}).map(
			(response: Response) => {
                if(response['statusText'] == 'Created'){
                    location.reload();
                    alert('Post created!');
                    this.router.navigate(['/posts']);
                }
                else{
                    alert('post not created');
                }
            }
		);
	}
	
	getOnePost(id: number): Observable<any>{
		return this.http.get('http://comp586.us-west-1.elasticbeanstalk.com/api/posts/' + id).map(
			(response: Response) => {
				return response.json().post;
			}
		);
	}

	getPosts(): Observable<any>{
		return this.http.get('http://comp586.us-west-1.elasticbeanstalk.com/api/posts').map(
			(response: Response) => {
				return response.json().posts;
			}
		);
	}

	updatePost(id: number, title: string, body: string) {
		const token = this.authService.getToken();

		const newPost = JSON.stringify({title: title, body: body});
		const headers = new Headers({'Content-Type': 'application/json'});
		return this.http.put('http://comp586.us-west-1.elasticbeanstalk.com/api/posts/' + id + "?token=" + token, newPost, {headers: headers}).map(
			(response: Response) => response.json()
		);
	}

	deletePost(id: number){
		const token = this.authService.getToken();
		
		return this.http.delete('http://comp586.us-west-1.elasticbeanstalk.com/api/posts/' + id + "?token=" + token);
	}
}