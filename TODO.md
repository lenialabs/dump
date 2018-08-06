# TODO

- migrate this project to PHP extension


 [done]     que se puedan mostrar varias variables
            ejemplo: dump(1, 2, 3, 4)

 ------------------------------------------------------------------------------

            si hay una excepcion que muestre los codigos, mensajes y ficheros
            de la excepcion y de las excepciones previas

-------------------------------------------------------------------------------

            IMPORTANTE: otro metodo que sea trace(), otro dumptrace()

 ------------------------------------------------------------------------------

            podria evolucionar a un tracer / debugger
            ...
            $this->getservicecontainer('tracer')->add($var1);
            ...
            $this->getservicecontainer('tracer')->add($var2);
            ...
            y luego vuelca los valores en un div visible o en metas
            (
                en el evento finish de Zend hacemos un replace de </head>:
                por:
                <script type="text/javascript">
                    .tracer {
                        position: absolute;
                        z-index: 10000;
                        ...
                    }
                </script>
                </head>

                y en body:
                <body>
                    <div class="tracer">...y aqui el contenido de la traza...</div>
                </body>

 ------------------------------------------------------------------------------

            que se pueda clicar en los ficheros y resalte la línea del dump
            o del error, o mejor que la muestre en un iframe:

            podria ser asi:

            ...
            dump($x)
            ...
            dump($y)
            ...
            dump()
            ...
