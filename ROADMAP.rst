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

How to integrate contexts:
- traits? can a trait inherit from a class?
We have a working context: ManagerRegistryContext which contains registry for
connections. This is perfectly usable right now.
Only problem is how to combine it with Mink or WebApi contexts.

For a decorator pattern to work, we would need to get previous context
being loaded. Is this even possible with Behat?

We are currently using a context that extends webApi or mink, then we
insert there all @tags we can in the form of @fixtureBla @fixtureMeh etc.

Review how pageobjectextension works, looks like a factory is being decorated.

Also take a look at:
https://gist.github.com/stof/930e968829cd66751a3a