export interface Movie {
  id?: number;         // Optional field denoting the movie's unique ID.
  title: string;      // The title of the movie (required).
  description: string; // A brief description of the movie (required).
  writer: string;     // The writer of the movie (required).
  image: string;      // The URL of the movie's image (required).
  date: string;       // The release date of the movie in 'YYYY-MM-DD' format (required).
  created_at?: string; // Optional field indicating the date and time when the movie record was created.
  updated_at?: string; // Optional field indicating the date and time when the movie record was last updated.
}
