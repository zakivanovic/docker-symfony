FROM node:10.14-alpine as node-angular-cli

#Linux setup
#RUN apt update \
#  && apt install --update alpine-sdk \
#  && apt del alpine-sdk \
#  && rm -rf /tmp/* /var/cache/apk/* *.tar.gz ~/.npm \
#  && npm cache verify \
#  && sed -i -e "s/bin\/ash/bin\/sh/" /etc/passwd

#Angular CLI
RUN npm install -g @angular/cli

ADD entrypoint.sh /var/www/entrypoint.sh
RUN chmod +x /var/www/entrypoint.sh

WORKDIR /var/www/front/

ENTRYPOINT ["/var/www/entrypoint.sh"]

CMD ["npm","start"]