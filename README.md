# Search Engine and Social Network

## Overview

This project is an innovative platform that seamlessly integrates the functionalities of a search engine and a social network. Inspired by the capabilities of platforms like Google and Facebook, this project provides users with a comprehensive experience that allows them to search the web, connect with others, and interact in real-time—all within a single, cohesive environment.

## Features

### Search Engine

- **Web Search**: Enables users to search for information across the web, leveraging a custom-built web crawler and indexer. The search engine is designed to deliver fast and relevant search results.
  
- **Custom Web Crawler**: A sophisticated web crawler that traverses the internet, gathering data from various websites to populate the search engine's index.

- **Indexer**: Organizes the collected data into an efficient structure that supports quick retrieval during searches.

- **Advanced Search Capabilities**: Supports complex search queries with various filters and options to refine search results based on user preferences.

### Social Network

- **User Profiles**: Each user has a personalized profile where they can share information, update their status, and manage their account details.

- **Friend Connections**: Users can connect with friends, accept friend requests, and manage their network of connections.

- **Messaging**: A built-in messaging system allows users to communicate privately with their friends. This feature includes support for sending and receiving messages in real-time.

- **News Feed**: The news feed provides a dynamic stream of content, combining updates from friends with personalized content sourced from the integrated search engine.

- **Real-Time Notifications**: Users receive real-time notifications for various activities, including new messages, friend requests, and updates from their connections.

- **Chat System**: A web socket-powered chat system facilitates real-time conversations between users, enhancing the social interaction experience.

## Technology Stack

### Backend
- **PHP**: Handles the server-side logic, managing requests, sessions, and interactions with the database.
- **MySQL**: A robust relational database management system that stores user data, search indexes, messages, and other dynamic content.

### Frontend
- **HTML**: Provides the structure of the web pages.
- **CSS**: Styles the application, ensuring a user-friendly and visually appealing interface.
- **JavaScript**: Implements client-side functionality, enhancing interactivity and user experience.

### Web Sockets
- **Real-Time Communication**: Web Sockets are utilized for features requiring real-time interaction, such as the chat system and instant notifications.

### Additional Technologies
- **RSS**: Utilized for content syndication, allowing users to subscribe to and receive updates from various sources.
- **XML**: Facilitates data interchange and is used for storing structured data that can be easily processed by the application.

## Installation

### 1. Clone the Repository
Start by cloning the project repository to your local machine:

```bash
git clone https://github.com/tejaschaudhari131/search-engine-social-network.git
```

### 2. Set Up the MySQL Database

- Import the SQL schema into your MySQL server to create the necessary database structure:
  
  ```bash
  mysql -u [username] -p [database_name] < path/to/database/schema.sql
  ```
  
- Update the `config.php` file located in the root directory of the project with your MySQL database credentials:

```php
// config.php

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'your_username');
define('DB_PASSWORD', 'your_password');
define('DB_NAME', 'your_database_name');
```

### 3. Set Up the Web Server

- **PHP Installation**: Ensure that PHP is installed on your machine and configured correctly. The project is designed to run on PHP 7.4 or later.

- **Apache Setup**:
  - Place the project files in the `www` or `htdocs` directory of your Apache web server.
  - Modify the Apache configuration if necessary to ensure the server correctly points to the project directory.

### 4. Launch the Application

- Once the web server is running, access the application through your web browser:

  ```http
  http://localhost/search-engine-social-network
  ```

## Usage

### Search Functionality
- Navigate to the home page and use the search bar to search the web. The search engine supports various queries and provides results based on relevance.

### Social Network Features
- **Sign Up**: Create a new account by signing up with a unique username and password.
- **Connect with Friends**: Send friend requests to connect with other users. Once connected, you can interact via messaging and view their updates on your news feed.
- **Share Content**: Post updates, share links, and engage with content shared by others in your network.
- **Real-Time Interaction**: Use the chat system to communicate with friends in real-time and receive instant notifications about activities in your network.

## Contributing

We welcome contributions from the community! To contribute:

1. Fork the repository on GitHub.
2. Create a new branch for your feature or bug fix.
3. Make your changes and ensure your code adheres to the project's coding standards.
4. Submit a pull request with a detailed explanation of your changes.

Please make sure that your contributions are well-documented and tested before submission.

## License

This project is licensed under the MIT License. You can find the full license text in the `LICENSE` file included in this repository.

## Contact

For any inquiries or support, please reach out to:

- **Tejaram Chaudhari**: [tejaschaudhari131@gmail.com](mailto:tejaschaudhari131@gmail.com)
