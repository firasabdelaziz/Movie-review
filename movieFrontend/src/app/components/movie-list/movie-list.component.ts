// movie-list.component.ts
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
  currentPage = 1;
  totalPages = 1;

  constructor(private movieService: MovieService) { }

  ngOnInit(): void {
    this.fetchMovies();
  }

  fetchMovies(): void {
    this.movieService.getMovies(this.currentPage).subscribe((response: any) => {
      this.movies = [...this.movies, ...response.data];
      this.totalPages = response.last_page;
    });
  }

  deleteMovie(id: number): void {
    this.movieService.deleteMovie(id).subscribe(() => {
      this.fetchMovies();
    });
  }

  loadMoreMovies(): void {
    if (this.currentPage < this.totalPages) {
      this.currentPage++;
      this.fetchMovies();
    }
  }

  hasMoreMovies(): boolean {
    return this.currentPage < this.totalPages;
  }
}
