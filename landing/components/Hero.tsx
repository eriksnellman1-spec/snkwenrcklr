export default function Hero() {
  return (
    <section className="bg-gradient-to-br from-blue-700 to-blue-900 text-white">
      <div className="mx-auto max-w-6xl px-6 py-24 text-center">
        <span className="inline-block rounded-full bg-blue-500/30 px-4 py-1 text-sm font-medium tracking-wide uppercase mb-6">
          HVAC Automation
        </span>
        <h1 className="text-4xl font-extrabold leading-tight tracking-tight sm:text-5xl lg:text-6xl">
          Run Your HVAC Business
          <br />
          <span className="text-blue-200">On Autopilot</span>
        </h1>
        <p className="mt-6 text-lg text-blue-100 max-w-2xl mx-auto">
          VVS Automation handles lead qualification, booking, follow-up, and
          reviews — so your team focuses on the work, not the admin.
        </p>
        <div className="mt-10 flex flex-col sm:flex-row gap-4 justify-center">
          <a
            href="#contact"
            className="rounded-full bg-white text-blue-800 font-semibold px-8 py-3 text-base hover:bg-blue-50 transition"
          >
            Get a Free Demo
          </a>
          <a
            href="#features"
            className="rounded-full border border-white/40 text-white font-semibold px-8 py-3 text-base hover:bg-white/10 transition"
          >
            See How It Works
          </a>
        </div>
      </div>
    </section>
  );
}
