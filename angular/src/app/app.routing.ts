
import { ModuleWithProviders } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { PostsComponent } from "./posts/posts.component";
import { NewPostComponent } from "./new-post/new-post.component";

const APP_ROUTES: Routes = [
	{ path: '', component: PostsComponent },
	{ path: 'new-post', component: NewPostComponent }
];

export const routing: ModuleWithProviders = RouterModule.forRoot(APP_ROUTES);