## ShortLink API - URL Shortening Service

The **ShortLink API** is a simple yet efficient **URL shortening service** built with **Laravel**. It allows users to generate short URLs, retrieve original links, track usage statistics, and delete short links when needed.

---

## Key Features

- **Generate Short URLs** – Convert long URLs into short, shareable links.
- **Retrieve Original URLs** – Redirect users to the original website.
- **Track Clicks** – Store usage statistics for each short link.
- **CRUD Operations** – Create, Read, Update, and Delete short links.

---

## Endpoints Overview

### 1. Create a Short URL
```http
POST /api/shorten
```
**Request Body (JSON):**
```json
{
  "original_url": "https://www.example.com/long-url-example"
}
```
**Response:**
```json
{
  "short_url": "https://short.ly/abc123"
}
```

---

### 2. Retrieve the Original URL & Redirect
```http
GET /{short_code}
```
**Example:**  
Visiting `https://short.ly/abc123` will redirect to `https://www.example.com/long-url-example`.

---

### 3. Get Short Link Details (Admin Use)
```http
GET /api/links/{short_code}
```
**Response:**
```json
{
  "original_url": "https://www.example.com/long-url-example",
  "short_url": "https://short.ly/abc123",
  "created_at": "2025-03-01"
}
```

---

### 4. Delete a Short Link
```http
DELETE /api/links/{short_code}
```
**Response:**
```json
{
  "message": "Short link deleted successfully!"
}
```

---

## Additional Features & Security

- **Rate Limiting** – Prevents spammy link generation.
- **Expiration Dates** – Option to set expiration for short links.
- **Analytics Tracking** – Store statistics on link usage.

This Laravel-based API makes it easy to generate, manage, and track short URLs efficiently! 🚀


