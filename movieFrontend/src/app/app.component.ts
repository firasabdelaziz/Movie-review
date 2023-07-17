import { Component } from '@angular/core';
import { Movie } from './models/movie.model';
import { MovieService } from './services/movie.service';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  constructor(private movieService: MovieService) {}

  onFilterByPublicationDate(date: Date | undefined): void {
    // Handle the case when date is undefined
    if (date) {
      // Implement filtering logic using the 'date' parameter
      // You can call the MovieService to fetch movies filtered by publication date
    } else {
      // Handle the case when the date is undefined (no date selected in the filter)
    }
  }

  onFilterByOpeningDate(date: Date | undefined): void {
    // Handle the case when date is undefined
    if (date) {
      // Implement filtering logic using the 'date' parameter
      // You can call the MovieService to fetch movies filtered by opening date
    } else {
      // Handle the case when the date is undefined (no date selected in the filter)
    }
  }
}
