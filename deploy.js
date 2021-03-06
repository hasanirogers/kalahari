
/* eslint-disable no-console */
const path = require('path');
const SftpClient = require('ssh2-sftp-client');

const isDev = process.argv.indexOf('--dev') > -1;

let localDir;
let remoteDir;
let filterDirs;

if (isDev) {
  localDir = '/wp-content/themes';
  remoteDir = '/var/www/kalahari.hasanirogers.me/public_html/wp-content/themes';
  filterDirs = /^(?!.*(.git|.github|node_modules))/gm;
} else {
  // localDir = '/wp-content/themes';
  // remoteDir = '/var/www/antbellmusic.com/public_html';
  // filterDirs = /^(?!.*(.git|.github|node_modules))/gm;
}

require('dotenv').config();

const config = {
  host: process.env.FTP_DEPLOY_HOST,
  username: process.env.FTP_DEPLOY_USERNAME,
  password: process.env.FTP_DEPLOY_PASSWORD,
  port: process.env.FTP_DEPLOY_PORT || 22,
};

const main = async () => {
  const client = new SftpClient();
  const src = path.join(__dirname, localDir);

  try {
    await client.connect(config);

    client.on('upload', (info) => {
      console.log(`Listener: Uploaded ${info.source}`);
    });

    const result = await client.uploadDir(src, remoteDir, filterDirs);

    return result;
  } finally {
    client.end();
  }
};

main()
  .then(message => console.log(message))
  .catch((error) => { console.log(`main error: ${error.message}`); });
