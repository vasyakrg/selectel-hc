# First Stage
FROM vasyakrg/selectel-hc:base

COPY docker /usr/local/bin
RUN chmod +x /usr/local/bin/entrypoint

ENTRYPOINT ["/usr/local/bin/entrypoint"]
