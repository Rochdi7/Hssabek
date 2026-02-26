"use client";

import { Card, Table, Dropdown } from "react-bootstrap";
import Image from "next/image";

const audioData = [
  {
    id: 1,
    title: "Mastering Digital Marketing",
    author: "Sarah Johnson",
    listens: "8,200",
    image: "/images/played-1.jpg",
    audioSrc: "https://cldup.com/qR72ozoaiQ.mp3",
    played: "40 min. ago",
    duration: "45:30",
  },
  {
    id: 2,
    title: "Content Marketing Essentials",
    author: "Tom Richards",
    listens: "9,500",
    image: "/images/played-2.jpg",
    audioSrc: "https://cldup.com/abc123defg.mp3",
    played: "1 h. ago",
    duration: "25:50",
  },
  {
    id: 3,
    title: "Social Media Trends for 2024",
    author: "David Chen",
    listens: "7,400",
    image: "/images/played-3.jpg",
    audioSrc: "https://cldup.com/xyz456hij.mp3",
    played: "1 day ago",
    duration: "30:20",
  },
  {
    id: 4,
    title: "Building Brand Loyalty",
    author: "Michael Young",
    listens: "10,200",
    image: "/images/played-4.jpg",
    audioSrc: "https://cldup.com/lmn789opq.mp3",
    played: "2 days ago",
    duration: "15:35",
  },
  {
    id: 5,
    title: "Content Creation Techniques",
    author: "Lisa Kim",
    listens: "9,300",
    image: "/images/played-5.jpg",
    audioSrc: "https://cldup.com/rst012uvw.mp3",
    played: "3 days ago",
    duration: "18:45",
  },
  {
    id: 6,
    title: "The Future of AI in Marketing",
    author: "Tom Richards",
    listens: "6,300",
    image: "/images/played-6.jpg",
    audioSrc: "https://cldup.com/ghi345jkl.mp3",
    played: "4 days ago",
    duration: "22:15",
  },
];

const RecentlyPlayed = () => {
  return (
    <>
      <Card
        className="card custom-shadow rounded-3 bg-white border mb-4"
        style={{
          paddingBottom: "16px",
        }}
      >
        <div
          className="d-flex justify-content-between align-items-center flex-wrap gap-3 custom-padding-30 position-relative pb-3"
          style={{
            top: "-5px",
          }}
        >
          <h3 className="mb-0 fs-18 fw-semibold">Recently Played</h3>
          <button
            className="bg-transparent border-0 p-0 d-flex align-items-center text-decoration-none position-relative text-body"
            style={{
              right: "-8px",
            }}
          >
            <span>View All</span>
            <i className="ri-arrow-right-s-line fs-24 position-relative top-1 lh-1 text-body"></i>
          </button>
        </div>

        <div className="default-table-area style-three recently-played">
          <div className="table-responsive">
            <Table className="align-middle border-0">
              <tbody>
                {audioData.map((track) => (
                  <tr key={track.id}>
                    <td>
                      <div className="d-flex">
                        <button className="p-0 border-0 bg-transparent me-3">
                          <audio className="track">
                            <source src={track.audioSrc} type="audio/mpeg" />
                          </audio>
                          <div className="player-container">
                            <div className="play-pause">Play</div>
                          </div>
                        </button>
                        <div className="d-flex align-items-center">
                          <div className="flex-shrink-0">
                            <Image
                              src={track.image}
                              className="rounded-1"
                              alt="played"
                              width={34}
                              height={34}
                            />
                          </div>
                          <div className="flex-grow-1 ms-10">
                            <h4 className="fs-14 fw-medium mb-0">
                              {track.title}
                            </h4>
                            <span className="fs-12 text-body fw-normal">
                              {track.author}
                            </span>
                          </div>
                        </div>
                      </div>
                    </td>
                    <td>
                      <span className="d-block fs-14 fw-normal text-body">
                        Played {track.played}
                      </span>
                    </td>
                    <td>
                      <div className="d-flex align-items-center">
                        <i className="ri-customer-service-line text-primary fs-18"></i>
                        <span className="d-block fs-14 fw-normal text-body ms-10">
                          {track.listens}
                        </span>
                      </div>
                    </td>
                    <td>
                      <button className="favorite-button border-0 text-body-color-60 fs-14 bg-transparent p-0">
                        <span className="favorite-icon position-relative">
                          <i className="ri-heart-line fs-20"></i>
                          <i className="ri-heart-fill fs-20 position-absolute top-50 start-50 translate-middle text-primary"></i>
                        </span>
                      </button>
                    </td>
                    <td>
                      <span className="text-body">{track.duration}</span>
                    </td>
                    <td>
                      <Dropdown className="action-opt">
                        <Dropdown.Toggle
                          variant="secondary"
                          id="dropdown-basic"
                          className="bg-transparent p-0"
                        >
                          <i className="material-symbols-outlined">
                            more_horiz
                          </i>
                        </Dropdown.Toggle>

                        <Dropdown.Menu className="bg-white border box-shadow">
                          <Dropdown.Item href="#">
                            <i className="material-symbols-outlined">add</i>
                            Add To Playlist
                          </Dropdown.Item>
                          <Dropdown.Item href="#">
                            <i className="material-symbols-outlined">
                              description
                            </i>
                            Go To Album
                          </Dropdown.Item>

                          <Dropdown.Item href="#">
                            <i className="material-symbols-outlined">
                              volume_up
                            </i>
                            View Credits
                          </Dropdown.Item>
                        </Dropdown.Menu>
                      </Dropdown>
                    </td>
                  </tr>
                ))}
              </tbody>
            </Table>
          </div>
        </div>
      </Card>
    </>
  );
};

export default RecentlyPlayed;
