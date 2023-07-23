import { Component, OnInit } from '@angular/core';
import { Movie } from '../../models/movie.model';
import { MovieService } from '../../services/movie.service';

@Component({
  selector: 'app-movie-list',
  templateUrl: './movie-list.component.html',
  styleUrls: ['./movie-list.component.css'],
})
export class MovieListComponent implements OnInit {
  movies: Movie[] = []; // Array to store the list of movies
  filteredMovies: Movie[] = []; // Array to store filtered movies
  currentPage = 1; // Variable to keep track of the current page number
  totalPages = 1; // Variable to store the total number of pages
  movieNameFilter: string = ''; // Variable to store the movie name filter
  filtersApplied: boolean = false; // Variable to track if filters are applied
  sortApplied: boolean = false; // Variable to track if sort is applied

  constructor(private movieService: MovieService) {}

  ngOnInit(): void {
    this.fetchMovies();
  }

  // Function to fetch movies from the MovieService and update the 'movies' array
  fetchMovies(): void {
    this.movieService.getMovies(this.currentPage).subscribe((response: any) => {
      this.movies = [...this.movies, ...response.data];
      this.totalPages = response.last_page;
    });
  }

  // Function to delete a movie by its ID
  deleteMovie(id: number): void {
    this.movieService.deleteMovie(id).subscribe(() => {
      this.fetchMovies();
    });
  }

  // Function to load more movies (pagination)
  loadMoreMovies(): void {
    if (this.currentPage < this.totalPages) {
      this.currentPage++;
      this.fetchMovies();
    }
  }

  // Function to check if there are more movies to load
  hasMoreMovies(): boolean {
    return this.currentPage < this.totalPages;
  }

  // Function to apply the movie name filter
  applyFilter(): void {
    let filteredMovies = this.movies.filter((movie) =>
      movie.title.toLowerCase().includes(this.movieNameFilter.toLowerCase())
    );
    this.movies = filteredMovies;
    this.filtersApplied = true; // Set the 'filtersApplied' flag to true since filters are applied
  }

  // Function to sort by publication date
  sortByPublicationDate(): void {
    this.movies = this.movies.sort(
      (a, b) =>
        new Date(a.created_at).getTime() - new Date(b.created_at).getTime()
    );
    this.sortApplied = true;
  }

  // Function to sort by opening date
  sortByOpeningDate(): void {
    this.movies = this.movies.sort(
      (a, b) => new Date(a.date).getTime() - new Date(b.date).getTime()
    );
    this.sortApplied = true;
  }

  // Function to reset filters
  cancelFilters() {
    this.movieNameFilter = '';
    this.fetchMovies();
    this.filtersApplied = false; // Set the 'filtersApplied' flag to false since filters are reset
  }

  // Function to reset sorting
  cancelSorting() {
    this.fetchMovies();
    this.sortApplied = false; // Set the 'sortApplied' flag to false since sorting is reset
  }
}
