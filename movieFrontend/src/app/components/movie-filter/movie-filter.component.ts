// movie-filter.component.ts
import { Component, EventEmitter, Output } from '@angular/core';

@Component({
  selector: 'app-movie-filter',
  templateUrl: './movie-filter.component.html',
  styleUrls: ['./movie-filter.component.css']
})
export class MovieFilterComponent {
  @Output() filterByPublicationDate = new EventEmitter<Date>();
  @Output() filterByOpeningDate = new EventEmitter<Date>();
  @Output() filterByCriticsPick = new EventEmitter<boolean>();
  @Output() orderByPublicationDate = new EventEmitter<void>();
  @Output() orderByOpeningDate = new EventEmitter<void>();

  selectedPublicationDate: Date | undefined;
  selectedOpeningDate: Date | undefined;
  isCriticsPick: boolean = false;

  applyPublicationDateFilter(): void {
    this.filterByPublicationDate.emit(this.selectedPublicationDate);
  }

  applyOpeningDateFilter(): void {
    this.filterByOpeningDate.emit(this.selectedOpeningDate);
  }

  toggleCriticsPickFilter(): void {
    this.isCriticsPick = !this.isCriticsPick;
    this.filterByCriticsPick.emit(this.isCriticsPick);
  }

  orderMoviesByPublicationDate(): void {
    this.orderByPublicationDate.emit();
  }

  orderMoviesByOpeningDate(): void {
    this.orderByOpeningDate.emit();
  }
}
