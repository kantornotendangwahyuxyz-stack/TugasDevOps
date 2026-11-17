# Pinned base image version
FROM nginx:1.27.2-alpine

# Set working directory
WORKDIR /usr/share/nginx/html

# Remove default nginx static files
RUN rm -rf ./*

# Copy web application files into nginx serving directory
COPY index.html script.js style.css ./

# Expose HTTP port
EXPOSE 80

# Start Nginx server
CMD ["nginx", "-g", "daemon off;"]
