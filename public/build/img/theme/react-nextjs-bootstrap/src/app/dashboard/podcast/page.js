import FeaturedMusic from "@/components/Dashboard/Podcast/FeaturedMusic";
import ListenerAnalytics from "@/components/Dashboard/Podcast/ListenerAnalytics";
import MostPopular from "@/components/Dashboard/Podcast/MostPopular";
import Player from "@/components/Dashboard/Podcast/Player";
import PopularHosts from "@/components/Dashboard/Podcast/PopularHosts";
import RecentlyPlayed from "@/components/Dashboard/Podcast/RecentlyPlayed";
import TodaysEarnings from "@/components/Dashboard/Podcast/TodaysEarnings";
import TopPodcasts from "@/components/Dashboard/Podcast/TopPodcasts";
import UpcomingEpisodes from "@/components/Dashboard/Podcast/UpcomingEpisodes";
import { Row, Col } from "react-bootstrap";

export default function Page() {
  return (
    <>
      <Row>
        <Col xxl={8}>
          <FeaturedMusic />
        </Col>

        <Col xxl={4}>
          <PopularHosts />
        </Col>
      </Row>

      <Row>
        <Col lg={8}>
          <RecentlyPlayed />
        </Col>

        <Col lg={4}>
          <Player />
        </Col>
      </Row>

      <Row>
        <Col xxl={8}>
          <MostPopular />
        </Col>

        <Col xxl={4}>
          <UpcomingEpisodes />

          <TodaysEarnings />
        </Col>
      </Row>

      <Row>
        <Col lg={5} xl={5} xxl={6}>
          <ListenerAnalytics />
        </Col>

        <Col lg={7} xl={7} xxl={6}>
          <TopPodcasts />
        </Col>
      </Row>
    </>
  );
}
