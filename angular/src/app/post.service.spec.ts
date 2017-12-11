import {
    async,
    TestBed ,
    getTestBed,
    inject
} from '@angular/core/testing';
import {
    Headers,
    BaseRequestOptions,
    Response,
    HttpModule,
    Http,
    XHRBackend,
    RequestMethod
} from '@angular/http';
import { By } from '@angular/platform-browser';
import { DebugElement } from '@angular/core';
import { MockBackend, MockConnection } from '@angular/http/testing';
import { ResponseOptions } from '@angular/http';
import { PostService } from './post.service';
import { AuthService } from './auth.service';
import { Post } from './post.interface';

describe('Post Service', function () {
    let mockBackend: MockBackend;

    beforeEach(async() => {
      TestBed.configureTestingModule( {
        providers: [
            PostService,
            MockBackend,
            BaseRequestOptions,
            AuthService,
            {
              provide: Http,
              deps: [MockBackend, BaseRequestOptions],
              useFactory:
              (backend: XHRBackend, defaultOptions: BaseRequestOptions) => {
                return new Http(backend, defaultOptions);
              }
            }
          ],
          imports: [
            HttpModule
          ]
        });
        mockBackend = getTestBed().get(MockBackend);
    });

    it('get all posts', done => {
        let postService: PostService;

        getTestBed().compileComponents().then(() => {
            mockBackend.connections.subscribe(
                (connection: MockConnection) => {
                connection.mockRespond(new Response(
                    new ResponseOptions({
                        body: [
                            {
                                id: 1,
                                user_id: 1,
                                title: 'First Post',
                                body: 'Post paragraph'
                            },
                            {
                                id: 2,
                                user_id: 1,
                                title: 'Second Post',
                                body: '586'
                            },
                            {
                                id: 3,
                                user_id: 2,
                                title: 'Last Post',
                                body: 'Semester'
                            }
                        ]
                    })
                ));
            });

            postService = getTestBed().get(PostService);
            expect(postService).toBeDefined();

            postService.getPosts().subscribe((posts: Post[]) => {
                expect(posts.length).toBeDefined();
                expect(posts.length).toEqual(2);
                expect(posts[0].user_id).toEqual(1);
                expect(posts[1].id).toEqual(2);
                done();
            });
        });
    });

    it('test that finishes', done => {
        // kick off an asynchronous call in the background
        setTimeout(() => {
            console.log('completed test');
            done();
        }, 1000);
    });
});
