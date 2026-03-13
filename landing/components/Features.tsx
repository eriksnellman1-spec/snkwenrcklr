const features = [
  {
    icon: "🎯",
    title: "Lead Qualification",
    description:
      "Automatically score and qualify inbound leads so your sales team only talks to serious prospects.",
  },
  {
    icon: "📅",
    title: "Booking & Scheduling",
    description:
      "Let customers book appointments 24/7 with smart scheduling that syncs directly with your calendar.",
  },
  {
    icon: "🔁",
    title: "Pipeline Follow-Up",
    description:
      "Automated SMS and email sequences keep leads warm and move deals forward without manual effort.",
  },
  {
    icon: "🚫",
    title: "No-Show Prevention",
    description:
      "Reduce costly no-shows with timely reminders and easy rescheduling links sent automatically.",
  },
  {
    icon: "⭐",
    title: "Review Automation",
    description:
      "Collect 5-star Google reviews on autopilot after every completed job to build your reputation.",
  },
  {
    icon: "👥",
    title: "Referral Campaigns",
    description:
      "Turn happy customers into your best salespeople with automated referral requests and rewards.",
  },
];

export default function Features() {
  return (
    <section id="features" className="bg-gray-50 py-24">
      <div className="mx-auto max-w-6xl px-6">
        <div className="text-center mb-16">
          <h2 className="text-3xl font-extrabold text-gray-900 sm:text-4xl">
            Everything Your HVAC Business Needs
          </h2>
          <p className="mt-4 text-lg text-gray-500 max-w-xl mx-auto">
            One platform. Six powerful automations. Zero extra headcount.
          </p>
        </div>
        <div className="grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
          {features.map((f) => (
            <div
              key={f.title}
              className="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 hover:shadow-md transition"
            >
              <div className="text-4xl mb-4">{f.icon}</div>
              <h3 className="text-xl font-bold text-gray-900 mb-2">{f.title}</h3>
              <p className="text-gray-500 leading-relaxed">{f.description}</p>
            </div>
          ))}
        </div>
      </div>
    </section>
  );
}
