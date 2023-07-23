export interface Movie {
  id: number;         // The movie's unique ID.
  title: string;      // The title of the movie .
  description: string; // A brief description of the movie .
  writer: string;     // The writer of the movie .
  image: string;      // The URL of the movie's image .
  date: string;       // The release date of the movie in 'YYYY-MM-DD' format .
  created_at: string; // field indicating the date and time when the movie record was created.
  updated_at?: string; // field indicating the date and time when the movie record was last updated.
}
