# tatrapayplus-php

[![Release](https://img.shields.io/github/v/release/tatrabanka/tatrapayplus-php)](https://img.shields.io/github/v/release/tatrabanka/tatrapayplus-php)
[![Build status](https://img.shields.io/github/actions/workflow/status/tatrabanka/tatrapayplus-php/php.yml?branch=main)](https://github.com/tatrabanka/tatrapayplus-php/actions/workflows/php.yml?query=branch%3Amain)
[![codecov](https://codecov.io/gh/tatrabanka/tatrapayplus-php/branch/main/graph/badge.svg)](https://codecov.io/gh/tatrabanka/tatrapayplus-php)
[![Commit activity](https://img.shields.io/github/commit-activity/m/tatrabanka/tatrapayplus-php)](https://img.shields.io/github/commit-activity/m/tatrabanka/tatrapayplus-php)
[![License](https://img.shields.io/github/license/tatrabanka/tatrapayplus-php)](https://img.shields.io/github/license/tatrabanka/tatrapayplus-php)

PHP SDK for Tatrapay+ payment gateway.

- **Github repository**: <https://github.com/tatrabanka/tatrapayplus-php/>
- **Documentation** <https://sdk.tatrabanka.sk/docs/libraries/php/v2.0.0>

## Type generation
To generate new types after OpenAPI structure has been changed please run
```
./generate_openapi_models.sh
```
This command will automatically generate models based on `tatrapayplus_api_sandbox.json` file
and preserve custom Model classes.\
Old models will be backed up in ModelBackup folder.