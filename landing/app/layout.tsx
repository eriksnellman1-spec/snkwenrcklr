import type { Metadata } from "next";
import "./globals.css";

export const metadata: Metadata = {
  title: "VVS Automation – Automate Your HVAC Business",
  description:
    "Automate lead qualification, booking, follow-up, and reviews for your HVAC company.",
};

export default function RootLayout({
  children,
}: Readonly<{
  children: React.ReactNode;
}>) {
  return (
    <html lang="en">
      <body className="antialiased font-sans">{children}</body>
    </html>
  );
}
