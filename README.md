# reqInspect 🕵️

`reqInspect` is a free, unlimited network request analyzer designed to help developers debug API calls, network requests, and any web-related communications.

## Features 🌟

- **Network Request Analysis**: Capture and inspect network requests in real-time.
- **API Debugging**: Easily debug API calls, view headers, payloads, and more.
- **Session Management**: Create sessions to group related requests.
- **Admin Dashboard**: A comprehensive admin dashboard to view statistics, feedback, and manage sessions.
- **Feedback System**: Users can provide feedback directly through the platform.
- **No Sign-Up Required**: Start using without any registration or personal information.

## General Overview 🌐

`reqInspect` is designed with the developer's convenience in mind. Whether you're debugging a complex API integration or just want to see what data your web app is sending and receiving, `reqInspect` provides a simple and intuitive interface to capture and analyze network requests.

## Technical Overview 🔧

- **Backend**: The application is built on the Laravel framework, providing a robust and scalable backend.
- **Frontend**: Leveraging Bootstrap for a responsive and user-friendly interface.
- **Database**: Uses a relational database to store sessions, network requests, and feedback.
- **Deployment**: Configured for deployment on an Apache2 server with Cloudflare for DNS management.

## Getting Started 🚀

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/ItsTino/reqInspect.git
   ```

2. **Install Dependencies**:
   ```bash
   composer install
   ```

3. **Environment Configuration**:
   - Rename `.env.example` to `.env`.
   - Update database and other configuration settings.

4. **Run Migrations**:
   ```bash
   php artisan migrate
   ```

5. **Start the Server**:
   ```bash
   php artisan serve
   ```

## Feedback 💌

Found a bug or have a suggestion? Please open an issue on GitHub or use the "Leave Feedback" button on the platform.

---
