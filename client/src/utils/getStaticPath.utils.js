const getStaticPath = () => {
	const isDevelopment = process.env.VUE_APP_NODE_ENV === 'development';
	const isProduction = process.env.VUE_APP_NODE_ENV === 'production';
	let staticPath = '';
	let protocol = '';
	if (isDevelopment) {
		staticPath = 'localhost:3000';
		protocol = 'http';
	} else if (isProduction) {
		staticPath = process.env.VUE_APP_SERVER_IP;
		protocol = 'https';
	}
	return {staticPath, protocol};
};

export default getStaticPath;
