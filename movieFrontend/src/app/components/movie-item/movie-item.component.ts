import { Component, Input } from '@angular/core';
import { Router } from '@angular/router';
import { Movie } from 'src/app/models/movie.model';

@Component({
  selector: 'app-movie-item',
  templateUrl: './movie-item.component.html',
  styleUrls: ['./movie-item.component.css']
})
export class MovieItemComponent {

  // The 'movie' property is an Input property, meaning it will receive data from its parent component.
  @Input("item") movie: Movie | undefined;

  constructor(private router: Router) { }

  // Function to navigate to the movie detail page when the movie item is clicked.
  NavigteToDetail() {
    this.router.navigateByUrl('movie/' + this.movie?.id);
  }
}
