* Table DB

# travels
- id PK - INT - AI
- category_id FK 
- title string
- description text
- destination_country string
- destination_city string
- cover_image string
- departure_date date
- return_date date
- is_published boolean	

# categories
- id PK - INT - AI
- name string
- icon string

# tags
- id PK - INT - AI
- name string
- color string

# itinerary_steps
- id PK - INT - AI
- travel_id FK
- day_number INT
- title string
- description text

# packing_items
- id PK - INT - AI
- travel_id FK
- item_name string
- is_mandatory boolean

# places
- id PK - INT - AI
- travel_id FK
- name string	
- type string
- description text	
- latitude decimal
- longitude	decimal	
- image	string

# photos
- id PK - INT - AI
- travel_id FK
- image string
- caption string


# Pivot

# tag_travel
- travel_id
- tag_id