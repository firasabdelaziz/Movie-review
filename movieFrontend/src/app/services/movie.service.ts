// movie.service.ts

import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Movie } from '../models/movie.model';
import { environment } from '../environements/environement.dev';


@Injectable({
  providedIn: 'root',
})
export class MovieService {
  private apiUrl = environment.apiUrl;

  constructor(private http: HttpClient) {}

  // Fetches all movies from the backend API
  getMovies(page: number): Observable<any> {
    const url = `${this.apiUrl}?page=${page}`;
    return this.http.get<any>(url);
  }

  // Fetches a single movie by its ID from the backend API
  getMovie(id: number): Observable<Movie> {
    return this.http.get<Movie>(`${this.apiUrl}/${id}`);
  }

  // Adds a new movie to the backend API
  addMovie(movie: Movie): Observable<Movie> {
    return this.http.post<Movie>(this.apiUrl, movie);
  }

  // Updates an existing movie on the backend API
  updateMovie(movie: Movie): Observable<Movie> {
    return this.http.put<Movie>(`${this.apiUrl}/${movie.id}`, movie);
  }

  // Deletes a movie from the backend API by its ID
  deleteMovie(id: number): Observable<any> {
    return this.http.delete<any>(`${this.apiUrl}/${id}`);
  }
}
