import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { Movie } from '../../models/movie.model';
import { MovieService } from '../../services/movie.service';

@Component({
  selector: 'app-movie-details',
  templateUrl: './movie-details.component.html',
  styleUrls: ['./movie-details.component.css']
})
export class MovieDetailsComponent implements OnInit {
  movie: Movie | null = null;

  constructor(
    private route: ActivatedRoute,
    private movieService: MovieService
  ) { }

  ngOnInit(): void {
    // Subscribe to changes in the route parameters to get the movie ID
    this.route.paramMap.subscribe(params => {
      const movieId = Number(params.get('id'));
      // Fetch the movie details based on the retrieved movie ID
      this.fetchMovie(movieId);
    });
  }

  // Fetches movie details from the MovieService using the provided ID
  fetchMovie(id: number): void {
    this.movieService.getMovie(id).subscribe(movie => {
      this.movie = movie; // Update the 'movie' property with the retrieved movie data
    });
  }
}
