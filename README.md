# tatrapayplus-php

[![Release](https://img.shields.io/github/v/release/SmartBase-SK/tatrapayplus-php)](https://img.shields.io/github/v/release/SmartBase-SK/tatrapayplus-php)
[![Build status](https://img.shields.io/github/actions/workflow/status/SmartBase-SK/tatrapayplus-php/php.yml?branch=main)](https://github.com/SmartBase-SK/tatrapayplus-php/actions/workflows/php.yml?query=branch%3Amain)
[![codecov](https://codecov.io/gh/SmartBase-SK/tatrapayplus-php/branch/main/graph/badge.svg)](https://codecov.io/gh/SmartBase-SK/tatrapayplus-php)
[![Commit activity](https://img.shields.io/github/commit-activity/m/SmartBase-SK/tatrapayplus-php)](https://img.shields.io/github/commit-activity/m/SmartBase-SK/tatrapayplus-php)
[![License](https://img.shields.io/github/license/SmartBase-SK/tatrapayplus-php)](https://img.shields.io/github/license/SmartBase-SK/tatrapayplus-php)

PHP SDK for Tatrapay+ payment gateway.

- **Github repository**: <https://github.com/SmartBase-SK/tatrapayplus-php/>
- **Documentation** <https://sdk.tatrabanka.sk/docs/libraries/php/v1.0.0>

## Type generation
To generate new types after OpenAPI structure has been changed please run
```
./generate_openapi_models.sh
```
This command will automatically generate models based on `tatrapayplus_api_sandbox.json` file
and preserve custom Model classes.\
Old models will be backed up in ModelBackup folder.