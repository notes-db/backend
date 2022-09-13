# Notes-lib API

A simple RESTful API written in PHP to connect to a MySQL DB. Follows CRUD naming convention (Create, Read, Update, Delete).

## Configuring
Create file `services/credentials.php`. Variables declared must be:
- Database credentials
  - `$host`
  - `$db`
  - `$user`
  - `$password`
- Backup email
  - `$email`

## Endpoints

- **createBackup.php**: sends a JSON encoded backup to the email in credentials
- **createComment.php**: creates a new comment tied to a post ID
- **createLike.php**: creates a like tied to post ID
- **createNote.php**: adds a new note to the library
- **readAuthors.php**: gives a list of note authors in order of frequency, as well as the number of notes they contributed
- **readNote.php**: gives note details
- **readNotePreviews.php**: gives basic information on all notes in the library

## License
Licensed under the MPL (Mozilla public license)
