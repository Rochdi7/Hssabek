"use client";

import { Card } from "react-bootstrap";
import Image from "next/image";

const channelsData = [
  {
    id: 1,
    icon: "/images/facebook.svg",
    name: "Facebook",
    type: "Community",
    progress: 50,
    progressBarColor: "#757DFF",
    progressBgColor: "#DDE4FF",
  },
  {
    id: 2,
    icon: "/images/dribbble.svg",
    name: "Dribbble",
    type: "Community",
    progress: 75,
    progressBarColor: "#5DA8FF",
    progressBgColor: "#DAEBFF",
  },
  {
    id: 3,
    icon: "/images/instagram.svg",
    name: "Instagram",
    type: "Reel",
    progress: 30,
    progressBarColor: "#FE7A36",
    progressBgColor: "#FFE8D4",
  },
  {
    id: 4,
    icon: "/images/google2.svg",
    name: "Google",
    type: "SEO & PPC",
    progress: 20,
    progressBarColor: "#58F229",
    progressBgColor: "#D8FFC8",
  },
];

const CustomersFromChannels = () => {
  return (
    <>
      <Card className="bg-white border-0 rounded-3 mb-4">
        <Card.Body className="p-4">
          <div className="mb-3 mb-lg-30 pb-2">
            <h3 className="mb-0">Customers From Channels</h3>
          </div>

          <ul className="ps-0 mb-0 list-unstyled">
            {channelsData.map((channel) => (
              <li key={channel.id} className="lcbmp-none mb-3 pb-3 border-bottom">
                <div className="d-flex align-items-center justify-content-between gap-2">
                  <div className="flex-shrink-0">
                    <div className="d-flex gap-3">
                      <Image
                        src={channel.icon} 
                        alt={channel.name}
                        width={30}
                        height={30}
                      />
                      <div>
                        <h4 className="mb-0 fs-14 fw-semibold lh-1">
                          {channel.name}
                        </h4>
                        <span className="fs-12">{channel.type}</span>
                      </div>
                    </div>
                  </div>

                  <div className="flex-grow-1">
                    <div className="d-flex align-items-center justify-content-end gap-2">
                      <div
                        className="progress-responsive"
                        style={{ width: "120px" }}
                      >
                        <div
                          className="progress rounded-pill"
                          style={{
                            height: "8px",
                            backgroundColor: channel.progressBgColor,
                          }}
                        >
                          <div
                            className="progress-bar rounded-pill"
                            style={{
                              width: `${channel.progress}%`,
                              height: "8px",
                              backgroundColor: channel.progressBarColor,
                            }}
                          ></div>
                        </div>
                      </div>

                      <span className="count text-body fs-12">
                        {channel.progress}%
                      </span>
                    </div>
                  </div>
                </div>
              </li>
            ))}
          </ul>
        </Card.Body>
      </Card>
    </>
  );
};

export default CustomersFromChannels;