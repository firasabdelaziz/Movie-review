import { Component, OnInit } from '@angular/core';
import { Movie } from '../../models/movie.model';
import { MovieService } from '../../services/movie.service';

@Component({
  selector: 'app-movie-list',
  templateUrl: './movie-list.component.html',
  styleUrls: ['./movie-list.component.css']
})
export class MovieListComponent implements OnInit {
  movies: Movie[] = [];

  constructor(private movieService: MovieService) { }

  ngOnInit(): void {
    this.fetchMovies();
    console.log(this.movies);

  }

  fetchMovies(): void {
    this.movieService.getMovies().subscribe(movies => {
      // Sort movies by publication date in descending order
      this.movies = movies.sort((a, b) => new Date(b.created_at!).getTime() - new Date(a.created_at!).getTime());
    });
  }

  deleteMovie(id: number): void {
    this.movieService.deleteMovie(id).subscribe(() => {
      this.fetchMovies();
    });
  }
}
