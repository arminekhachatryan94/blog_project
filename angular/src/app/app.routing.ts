
import { ModuleWithProviders } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { PostsComponent } from "./posts/posts.component";
import { NewPostComponent } from "./new-post/new-post.component";
import { RegisterComponent } from "./register/register.component";
import { LoginComponent } from "./login/login.component";
import { PostComponent } from './post/post.component';
import { ViewPostComponent } from './view-post/view-post.component';

export const APP_ROUTES: Routes = [
	{ path: '', component: PostsComponent },
	{ path: 'posts',
	children: [
		{ path: '', component: PostsComponent }
		/*, { path: ':id', component: ViewPostComponent }*/
	] },
	{ path: 'new-post', component: NewPostComponent },
	{ path: 'register', component: RegisterComponent },
	{ path: 'login', component: LoginComponent },
];

export const appRoutingProviders: any[] = [];

export const routing: ModuleWithProviders = RouterModule.forRoot(APP_ROUTES);