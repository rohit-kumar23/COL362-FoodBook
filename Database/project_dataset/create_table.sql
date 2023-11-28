
DROP TABLE IF EXISTS Place;
DROP TABLE IF EXISTS Tag;
DROP TABLE IF EXISTS Comment;
DROP TABLE IF EXISTS Recipe;
DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS Comment_hasTag_Tag;
DROP TABLE IF EXISTS Recipe_hasTag_Tag;
DROP TABLE IF EXISTS User_hasInterest_Tag;
DROP TABLE IF EXISTS User_likes_Comment;
DROP TABLE IF EXISTS User_likes_Recipe;
DROP TABLE IF EXISTS User_knows_User;


-- CREATE TABLE Organisation (
--     id bigint PRIMARY KEY,
--     type varchar NOT NULL,
--     name varchar NOT NULL,
--     url varchar NOT NULL,
--     LocationPlaceId bigint NOT NULL
-- ) ;

CREATE TABLE Place (
    id bigint PRIMARY KEY,
    name varchar NOT NULL,
    url varchar NOT NULL,
    type varchar NOT NULL,
    PartOfPlaceId bigint -- null for continents
) ;

CREATE TABLE Tag (
    id BIGSERIAL PRIMARY KEY,
    name varchar NOT NULL,
    url varchar NOT NULL
) ;

-- CREATE TABLE TagClass (
--     id bigint PRIMARY KEY,
--     name varchar NOT NULL,
--     url varchar NOT NULL,
--     SubclassOfTagClassId bigint -- null for the root TagClass (Thing)
-- ) ;




CREATE TABLE Comment (
    creationDate date NOT NULL,
    creationTime time NOT NULL,
    id BIGSERIAL, -- PRIMARY KEY,
    locationIP varchar NOT NULL,
    browserUsed varchar NOT NULL,
    content varchar NOT NULL,
    length int NOT NULL,
    CreatorUserId bigint NOT NULL,
    LocationCountryId bigint NOT NULL,
    ParentRecipeId bigint,
    ParentCommentId bigint
) ;

CREATE TABLE Recipe (
    creationDate date NOT NULL,
    creationTime time NOT NULL,
    id BIGSERIAL, -- PRIMARY KEY,
    title varchar NOT NULL,
    imageFile varchar,
    locationIP varchar NOT NULL,
    browserUsed varchar NOT NULL,
    language varchar,
    instruction varchar,
    length int NOT NULL,
    CreatorUserId bigint NOT NULL,
    LocationCountryId bigint NOT NULL
) ;

CREATE TABLE Users (
    creationDate date NOT NULL,
    creationTime time NOT NULL,
    id BIGSERIAL PRIMARY KEY,
    firstName varchar NOT NULL,
    lastName varchar NOT NULL,
    gender varchar NOT NULL,
    birthday date NOT NULL,
    locationIP varchar NOT NULL,
    browserUsed varchar NOT NULL,
    LocationCityId bigint NOT NULL,
    speaks varchar NOT NULL,
    email varchar NOT NULL,
    username varchar NOT NULL,
    passwordHash varchar NOT NULL
) ;

CREATE TABLE Comment_hasTag_Tag (
    creationDate date NOT NULL,
    creationTime time NOT NULL,
    CommentId bigint NOT NULL,
    TagId bigint NOT NULL
) ;
CREATE TABLE Recipe_hasTag_Tag (
    creationDate date NOT NULL,
    creationTime time NOT NULL,
    RecipeId bigint NOT NULL,
    TagId bigint NOT NULL
) ;

CREATE TABLE User_hasInterest_Tag (
    creationDate date NOT NULL,
    creationTime time NOT NULL,
    UserId bigint NOT NULL,
    TagId bigint NOT NULL
) ;

CREATE TABLE User_likes_Comment (
    creationDate date NOT NULL,
    creationTime time NOT NULL,
    UserId bigint NOT NULL,
    CommentId bigint NOT NULL
) ;

CREATE TABLE User_likes_Recipe (
    creationDate date NOT NULL,
    creationTime time NOT NULL,
    UserId bigint NOT NULL,
    RecipeId bigint NOT NULL
) ;


CREATE TABLE User_knows_User (
    creationDate date NOT NULL,
    creationTime time NOT NULL,
    User1id bigint NOT NULL,
    User2id bigint NOT NULL,
    PRIMARY KEY (User1id, User2id)
) ;
