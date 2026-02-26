"use client";

import { Card } from "react-bootstrap";

const Description = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4 rounded-top-0">
        <Card.Body className="p-4">
          <p>
            The Apple MacBook Pro 16.2 is a cutting-edge laptop designed to
            deliver exceptional performance and advanced features for
            professionals and creative enthusiasts. With its sleek aluminum body
            and precision engineering, this MacBook Pro represents the pinnacle
            of Apple laptop technology.
          </p>
          <p>
            Stay connected with a variety of ports, including Thunderbolt 3,
            USB-C, and audio jacks. These versatile ports support high-speed
            data transfer and external device connections. Enjoy a rich audio
            experience with high-fidelity speakers that deliver clear and
            immersive sound. Perfect for content creators and multimedia
            enthusiasts.
          </p>
          <p>
            Equipped with the latest processors, ample RAM, and high-performance
            graphics, the MacBook Pro 16.2 ensures smooth multitasking, fast
            rendering, and efficient handling of resource-intensive tasks.
            Seamlessly integrate with the macOS ecosystem, benefiting from
            features like iCloud, Siri, and a vast selection of applications
            available on the App Store.
          </p>
        </Card.Body>
      </Card>
    </>
  );
};

export default Description;
