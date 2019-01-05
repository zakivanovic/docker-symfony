#!/bin/sh

# Install angular dependancies
npm i

npm run build --prod

exec "$@"