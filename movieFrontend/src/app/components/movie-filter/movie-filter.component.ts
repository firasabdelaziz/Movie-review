import { Component, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'app-movie-filter',
  templateUrl: './movie-filter.component.html',
  styleUrls: ['./movie-filter.component.css']
})
export class MovieFilterComponent {
  @Output() filterByPublicationDate = new EventEmitter<Date | undefined>();
  @Output() filterByOpeningDate = new EventEmitter<Date | undefined>();

  publicationDate: Date | null = null;
  openingDate: Date | null = null;

  filterByPublication(): void {
    this.filterByPublicationDate.emit(this.publicationDate ? this.publicationDate : undefined);
  }

  filterByOpening(): void {
    this.filterByOpeningDate.emit(this.openingDate ? this.openingDate : undefined);
  }
}
