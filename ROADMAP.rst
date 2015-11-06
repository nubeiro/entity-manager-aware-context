- Create composer.json file. 
- create readme file contents. 
- add license file
- set semantic versioning
- The extension must have a plain doctrine aware context and a decorator sorts of context.
- 1) we need to read config
- 2) with config, instantiate as many em's as defined databases. 
- 2.0) might need an Em factory for that. 
- 2.1) and a Em pool
- 

    In your ``behat.yml`` file you can include: 
.. code-block:: yaml
    default:
        extensions:
            Nubeiro\DoctrineAwareContext\Extension:
                databases:
                    
    
                            