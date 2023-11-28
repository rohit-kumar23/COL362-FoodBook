#!/bin/bash

echo "Starting PHP server..."

# Start PHP server in the background
php -S localhost:8082 > /dev/null 2>&1 &

# Capture the process ID of the PHP server
PHP_SERVER_PID=$!

# Give the server a moment to start
sleep 1

# Check if the PHP server started successfully
if kill -0 "$PHP_SERVER_PID" > /dev/null 2>&1; then
    echo 'PHP server started'
    echo 'http://127.0.0.1:5045'
else
    echo 'Failed to start PHP server'
    exit 1
fi
