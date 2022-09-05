FROM node:12-buster-slim

WORKDIR /assets

COPY ../../ .

COPY .docker/node/entrypoint.sh /entrypoint.sh

RUN chmod +x /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]